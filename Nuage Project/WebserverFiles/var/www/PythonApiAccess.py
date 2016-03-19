#!/usr/bin/python3
import requests
import json

print("GET request by Python")
r = requests.get('http://localhost/api.php?table=LatLong&state=CA&method=GET')
print (r);
data = r.json()
print("state: {}".format(data[0] ["state"]))
print("latitude: {}".format(data[0] ["latitude"]))
print("longitude: {}".format(data[0] ["longitude"]))
print()

print("PUT request by Python")
r = requests.put('http://localhost/api.php?table=LatLong&state=CA&lat=27.6648274&lon=-81.5157535&method=PUT')
print (r);
data = r.json()
print("state: {}".format(data[0] ["state"]))
print("latitude: {}".format(data[0] ["latitude"]))
print("longitude: {}".format(data[0] ["longitude"]))
print()

print("DELETE request by Python")
r = requests.delete("http://localhost/api.php?table=LatLong&state=CA&method=DELETE")
print (r);
data = r.json()
if not data:
	print("The state was deleted successfully")
else:
	print("state: {}".format(data[0] ["state"]))
	print("latitude: {}".format(data[0] ["latitude"]))
	print("longitude: {}".format(data[0] ["longitude"]))
print()

print("POST request by Python")
r = requests.post('http://localhost/api.php?table=LatLong&state=CA&lat=36.7782610&lon=-119.4179324&method=POST')
print (r);
data = r.json()
print("state: {}".format(data[0] ["state"]))
print("latitude: {}".format(data[0] ["latitude"]))
print("longitude: {}".format(data[0] ["longitude"]))
print()
