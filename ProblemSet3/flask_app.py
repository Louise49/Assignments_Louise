
from flask import Flask, render_template, json, request
from flask import Markup
import requests

app = Flask(__name__)
app.config["DEBUG"] = False

@app.route('/')
@app.route('/index')
def index():
    return render_template('index.html')

@app.route('/slideshow')
def slideshow():
    return render_template('project-slideshow.html')

@app.route("/news")
def news():

    r = requests.get('https://api.airtable.com/v0/appHwbaV8AGAurNlN/BBC%20News?api_key=key3P4gTMtrDY1ylx')
    dict = r.json()
    dataset = []
    for i in dict['records']:
            dict = i['fields']
            dataset.append(dict)

    return render_template('portfolio.html', entries=dataset)

@app.route('/image')
def image():
    return render_template('project-image.html')

@app.route('/blog')
def blog():
    return render_template('blog.html')

@app.route('/archives')
def archives():
    return render_template('archives.html')

@app.route('/contact')
def contact():
    return render_template('contact.html')

if __name__ == '__main__':
    app.run(debug = True)

@app.route("/chart")
def chart():

    headers = {'Authorization': 'Bearer key3P4gTMtrDY1ylx',}
    params = (('view', 'Grid view'),)

    r = requests.get('https://api.airtable.com/v0/app2NBCmJfpGAM63x/ps3rollup?api_key=key3P4gTMtrDY1ylx', headers=headers, params=params)
    dict1 = r.json()
    dict2 = {}
    dataset = []
    name_list = []
    total_entries_list = []
    for i in dict1['records']:
         dict2 = i['fields']
         dataset.append(dict2)
    for item in dataset:
        name_list.append(item.get('user_name'))
        total_entries_list.append(item.get('total_score'))

    return render_template('mchart.html', entries = zip(name_list, total_entries_list))
