# Import necessary libraries
import numpy as np
import cv2
import pickle

# Load trained Haar cascade classifier for face detection
face_cascade = cv2.CascadeClassifier('cascades/data/haarcascade_frontalface_alt2.xml')
# Load trained face recognizer
recognizer = cv2.face.LBPHFaceRecognizer_create()
recognizer.read("trainer.yml")

# Load label dictionary from file
labels ={"person_name": 1} # Provide a default label
with open("labels.pickle", 'rb') as f:
    og_labels = pickle.load(f)
    labels = {v:k for k,v in og_labels.items()}

# Open video capture device
cap = cv2.VideoCapture(0)

# Initialize recognized flag
recognized = False

# Start video capture loop
while True:
    # Read frame from video capture device
    ret, frame = cap.read()
    
    # Convert frame to grayscale
    gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
    
    # Detect faces in the frame
    faces = face_cascade.detectMultiScale(gray, scaleFactor=1.5, minNeighbors=5)
    
    # Iterate over each detected face
    for(x,y,w,h) in faces:
        # Extract the region of interest for the face
        roi_gray = gray[y:y+h, x:x+w]
        roi_color = frame[y:y+h, x:x+w]

        # Use recognizer to predict the label for the face
        id_, conf = recognizer.predict(roi_gray)
        if conf >= 65:
            # If the confidence is high enough, retrieve the label and set recognized flag
            label = labels[id_]
            recognized = True
            break

        # Save the region of interest as an image
        img_item = "image-cap.png"
        cv2.imwrite(img_item, roi_color)

        # Draw a rectangle around the face in the frame
        color = (255, 0, 0) #BGR
        stroke = 2
        end_cord_x = x+w
        end_cord_y = y+x
        cv2.rectangle(frame,(x,y), (end_cord_x, end_cord_y), color, stroke)

    # Display the frame
    cv2.imshow('frame', frame)

    # Exit loop if face is recognized or user presses 'q' key
    if recognized:
        break
    if cv2.waitKey(1) & 0xFF == ord('q'):
        break

# Release video capture device and destroy windows
cap.release()
cv2.destroyAllWindows()

# Write the recognized label to a file
if recognized:
    with open('recognized_label.txt', 'w') as f:
        f.write(label)
else:
    with open('recognized_label.txt', 'w') as f:
        f.write('Face not recognized.')