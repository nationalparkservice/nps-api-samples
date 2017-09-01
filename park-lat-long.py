import urllib.request, json

# Configure API request
park = "acad"
endpoint = "https://developer.nps.gov/api/v0/parks?parkCode=" + park
HEADERS = {"Authorization":"INSERT-API-KEY-HERE"}
req = urllib.request.Request(endpoint,headers=HEADERS)

# Execute request and parse response
response = urllib.request.urlopen(req).read()
data = json.loads(response.decode('utf-8'))

# Prepare and execute output
print(data["data"][0]["fullName"] + " can be found at " + data["data"][0]["latLong"] + ".")
