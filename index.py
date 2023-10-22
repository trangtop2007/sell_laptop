import speech_recognition

robot=speech_recognition.Recognizer()
with speech_recognition.AudioFile(r"C:\Users\trang\Downloads\Music\10. Car Repairs.wav") as mic:
    try:
        robot.adjust_for_ambient_noise(mic)
        audio=robot.listen(mic,timeout=5)
        result=robot.recognize_google(audio_data=audio)
    except:
        result="OK"
        
print(result)