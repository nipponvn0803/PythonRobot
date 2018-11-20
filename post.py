import requests

url = "http://trinhson.com"
files = {'file': open('motion.py', 'rb')}
r = requests.post(url,files=files)
r.text
