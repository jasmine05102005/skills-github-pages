import requests
from bs4 import BeautifulSoup
import sqlite3


url = "index.html"
response = requests.get(url)
soup = BeautifulSoup(response.text, "html.parser")


data = [(tag.text, tag['href']) for tag in soup.find_all('a', href=True)]


conn = sqlite3.connect("website_data.db")
cursor = conn.cursor()
cursor.execute("CREATE TABLE IF NOT EXISTS Links (title TEXT, url TEXT)")

cursor.executemany("INSERT INTO Links (title, url) VALUES (?, ?)", data)
conn.commit()
conn.close()
