import cv2
import os
import numpy as np
from flask import Flask
from cv2 import VideoCapture
from flask import redirect
from cv2 import VideoCapture, cvtColor, COLOR_BGR2GRAY
# import face_recognition


app = Flask(__name__)

photos_folder = r'C:\xampp1\htdocs\Hello world\photo'

# Load the images and convert them to grayscale
images = []
labels = []
for file_name in os.listdir(photos_folder):
    image_path = os.path.join(photos_folder, file_name)
    image = cv2.imread(image_path)
    if image is not None:
        gray_image = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY) # convert to grayscale
        images.append(gray_image)
        labels.append(int(file_name.split('.')[0]))

# Train the face recognizer
face_recognizer = cv2.face.LBPHFaceRecognizer_create()
face_recognizer.train(images, np.array(labels))

# Rest of the code


@app.route('/')
def home():
    return 'Welcome to the home page!'

@app.route('/login')
def login():
    
    # Initialize the camera
    camera = cv2.VideoCapture(0)
    # Capture a new image from the camera
    
    while True:
        ret, image = camera.read()
        cv2.imshow('frame', image)
        if cv2.waitKey(1) & 0xFF == ord('q'):
            cv2.destroyAllWindows()
            break

    camera.release()
    
    

    # Convert the captured image to grayscale
    gray_image = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)

    # Recognize the face in the captured image
    label, confidence = face_recognizer.predict(gray_image)

    # Check if the recognized face matches with any of the saved images
    if label == 1: # replace 1 with the label of the correct face
        return redirect('http://localhost/student_home.php')
    else:
        return 'Access denied'

if __name__ == '__main__':
    app.run(debug=True)