# Import necessary libraries
import os
import cv2
import numpy as np
from PIL import Image
import pickle

# Load trained Haar cascade classifier for face detection
face_cascade = cv2.CascadeClassifier('cascades/data/haarcascade_frontalface_alt2.xml')
# Create an instance of LBPH face recognizer
recognizer = cv2.face.LBPHFaceRecognizer_create()

# Set up paths and variables
BASE_DIR = os.path.dirname(os.path.abspath(__file__))
img_dir = os.path.join(BASE_DIR, "images")
current_id = 0
label_ids = {}
y_labels = []
x_train = []

# Traverse the directory containing the images and extract label and image information
for root, dirs, files in os.walk(img_dir):
    for file in files:
        if file.endswith(".jpg") or file.endswith(".png"):
            path = os.path.join(root, file)
            label = os.path.basename(os.path.dirname(path)).replace(" ", "-").lower()
            print(label, path)
            
            # Convert label into numerical ids
            if not label in label_ids:
                label_ids[label] = current_id
                current_id +=1
            id_ = label_ids[label]
            
            # Load the image and convert it to grayscale
            pil_image = Image.open(path).convert("L")  # to grayscale
            size= (550, 550)
            final_image = pil_image.resize(size, Image.ANTIALIAS)
            image_array = np.array(final_image, "uint8")
            
            # Detect faces in the image and extract the region of interest
            faces = face_cascade.detectMultiScale(image_array, scaleFactor=1.5, minNeighbors=5)
            for(x,y,w,h) in faces:
                roi = image_array[y:y+h, x:x+w]
                x_train.append(roi)
                y_labels.append(id_)

# Save the label dictionary to a file using pickle
with open("labels.pickle", 'wb') as f:
    pickle.dump(label_ids, f)

# Train the face recognizer on the training data
recognizer.train(x_train, np.array(y_labels))

# Save the trained model to a file
recognizer.save("trainer.yml")