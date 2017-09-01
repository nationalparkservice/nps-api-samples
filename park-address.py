import urllib.request, json

# Configure API request
park = "acad"
endpoint = "https://developer.nps.gov/api/v0/parks?parkCode=" + park + "&fields=addresses"
HEADERS = {"Authorization":"INSERT-API-KEY-HERE"}
req = urllib.request.Request(endpoint,headers=HEADERS)

# Execute request and parse response
response = urllib.request.urlopen(req).read()
data = json.loads(response.decode('utf-8'))

# Prepare and execute output
print(data["data"][0]["fullName"])
for address in data["data"][0]["addresses"]:
    if address["type"] == "Mailing":
        print(address["line1"])
        if address["line2"] != "":
            print(address["line2"])
        if address["line3"] != "":
            print(address["line3"])
        print(address["city"] + ", " + address["stateCode"] + " " + str(address["postalCode"]))
