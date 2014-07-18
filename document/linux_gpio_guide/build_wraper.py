#-*- coding: UTF-8 -*-
import sys
import os

replace_tuple = [
	("_static/","static/"),
	("_sources/", "sources/")]

def filter_html(name):
	ext = os.path.splitext(name) [1] 
	ext = ext.lower()
	if ext == ".html":
		return True
	return False

os.chdir(os.path.join("build","html"))

if os.path.exists("static"):
	os.removedirs("static")
if os.path.exists("sources"):
	os.removedirs("sources")

for root, dirs, files in os.walk("."):
	html_files = filter(filter_html, files)
	for f in html_files:
		all_string = ['']
		with open(os.path.join(root,f), "r") as fd:
			all_string[0] = fd.read()
			for rt in replace_tuple:
				all_string[0] = all_string[0].replace(*rt)
			#~ print all_string[0]
		with open(os.path.join(root,f), "w") as fd:
			fd.write(all_string[0])
		print os.path.join(root,f)

if os.path.exists("_static"):
	os.rename("_static", "static")
if os.path.exists("_sources"):
	os.rename("_sources", "sources")

