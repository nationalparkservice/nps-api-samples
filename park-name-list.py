import urllib.request, json

# Configure API request
# Note limit parameter is arbitrary value greater than total number of NPS sites
endpoint = "https://developer.nps.gov/api/v0/parks?limit=600"
HEADERS = {"Authorization":"INSERT-API-KEY-HERE"}
req = urllib.request.Request(endpoint,headers=HEADERS)

# Execute request and parse response
response = urllib.request.urlopen(req).read()
data = json.loads(response.decode('utf-8'))

# Prepare and execute output
for park in data["data"]:
    print(park["fullName"])
