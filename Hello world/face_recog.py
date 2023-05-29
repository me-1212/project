import cv2
import os
from flask import Flask, redirect

app = Flask(__name__)

# Load the saved images from the photos folder
photos_folder = 'photos'
images = []
for file_name in os.listdir(photos_folder):
    image = cv2.imread(os.path.join(photos_folder, file_name))
    images.append(image)

# Initialize the face recognizer
face_recognizer = cv2.face.LBPHFaceRecognizer_create()

# Train the face recognizer with the loaded images
face_recognizer.train(images, np.array([1, 2, 3])) # replace [1, 2, 3] with the corresponding labels for each image

# Initialize the camera
camera = cv2.VideoCapture(0)

@app.route('/')
def home():
    return 'Welcome to the home page!'

@app.route('/login')
def login():
    # Capture a new image from the camera
    ret, image = camera.read()

    # Convert the captured image to grayscale
    gray_image = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)

    # Recognize the face in the captured image
    label, confidence = face_recognizer.predict(gray_image)

    # Check if the recognizedface matches with any of the saved images
    if label == 1: # replace 1 with the label of the correct face
        return redirect('http://localhost/student_home.php')
    else:
        return 'Access denied'

if __name__ == '__main__':
    app.run(debug=True)