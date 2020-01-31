import requests
#r = requests.post("http://localhost/receiver.php", data={'number': 12524, 'type': 'issue', 'action': 'show'})

#this line works for me without problem
#r = requests.post("http://localhost/receiver.php", data={'x1': 'mark', 'type': 'text', 'action': 'show'})

r = requests.post("http://localhost/receiver.php", data={'x1': 'mark', 'type': 'text', 'action': 'show'})

print(r.status_code, r.reason)
# 200 OK
print(r.text[:300] + '...')
