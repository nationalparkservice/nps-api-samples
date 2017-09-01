import urllib.request, json
from datetime import date

# Configure API request
state = "me"
endpoint = "https://developer.nps.gov/api/v0/parks?stateCode=" + state
HEADERS = {"Authorization":"INSERT-API-KEY-HERE"}
req = urllib.request.Request(endpoint,headers=HEADERS)

# Execute request and parse response
response = urllib.request.urlopen(req).read()
data = json.loads(response.decode('utf-8'))

# Prepare list of parks
numParks = data["total"]
print("There are " + str(numParks) + " in " + state.upper() + ".")
for park in data["data"]:
    print(park["fullName"])
