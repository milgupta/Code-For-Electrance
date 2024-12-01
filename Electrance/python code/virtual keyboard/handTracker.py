import mediapipe as mp
import numpy as np
import cv2

class HandTracker:
    def __init__(self, mode=False, maxHands=2, detectionCon=0.5, trackCon=0.5):
        print("Inside HandTracker __init__")
        self.mode = mode
        self.maxHands = maxHands
        self.detectionCon = detectionCon
        self.trackCon = trackCon

        print("Setting up mediapipe Hands")
        self.mpHands = mp.solutions.hands
        print("mediapipe Hands set up")

        try:
            print("Attempting to create Hands instance")
            self.hands = self.mpHands.Hands(
                static_image_mode=self.mode,
                max_num_hands=self.maxHands,
                min_detection_confidence=self.detectionCon,
                min_tracking_confidence=self.trackCon
            )
            print("Hands instance created")
        except Exception as e:
            print(f"Failed to create Hands instance: {e}")

        self.mpDraw = mp.solutions.drawing_utils
        print("HandTracker __init__ completed")

    def findHands(self, img, draw=True):
        print("Inside findHands")
        imgRGB = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)
        self.results = self.hands.process(imgRGB)

        if self.results.multi_hand_landmarks:
            for handLm in self.results.multi_hand_landmarks:
                if draw:
                    self.mpDraw.draw_landmarks(img, handLm, self.mpHands.HAND_CONNECTIONS)
        return img

    def getPostion(self, img, handNo=0, draw=True):
        print("Inside getPostion")
        lmList = []
        if self.results.multi_hand_landmarks:
            myHand = self.results.multi_hand_landmarks[handNo]
            for id, lm in enumerate(myHand.landmark):
                h, w, c = img.shape
                cx, cy = int(lm.x * w), int(lm.y * h)
                lmList.append([id, cx, cy])

                if draw:
                    cv2.circle(img, (cx, cy), 5, (255, 0, 255), cv2.FILLED)
        return lmList
