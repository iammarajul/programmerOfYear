from selenium.webdriver import Chrome
import pandas as pd
import mysql.connector
import sys


webdriver = 'C:/xampp/htdocs/Dairy/API/toph/python/chromedriver3.exe'

driver = Chrome(webdriver)

url = "https://toph.co/submissions/filter?author=590d7d60de14194eb555201c&verdict="
driver.get(url)
quotes = driver.find_elements_by_class_name("syncer")
for quote in quotes:
	row=quote.find_elements_by_tag_name("td")
	print(row[0].text)
		
print("successfull")
driver.close()
sys.exit()

