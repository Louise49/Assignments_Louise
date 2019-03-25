from flask import Flask, render_template, request, json, redirect, session
from flask import Markup
from flask_login import LoginManager, login_user, logout_user, login_required, UserMixin
import requests

app = Flask(__name__)
app.config["DEBUG"] = False
app.config['SECRET_KEY'] = "JutzX21JOBqOdxlCV8xqqnxD"
login_manager = LoginManager()
login_manager.init_app(app)
login_manager.login_view = 'login'

@login_manager.user_loader
def load_user(user_id):
    return User(user_id)

class User(UserMixin):
  def __init__(self,id):
    self.id = id

@app.route("/")
@login_required
def index():
    return render_template('index.html')

@app.route("/map")
@login_required
def map():
    headers = {
        'Authorization': 'Bearer key3P4gTMtrDY1ylx',
    }

    params = (
        ('view', 'Grid view'),
    )
    r = requests.get('https://api.airtable.com/v0/appdKlfv4HAjmlZGI/Json?api_key=key3P4gTMtrDY1ylx', headers=headers, params=params)
    dict = r.json()
    dataset = []
    for i in dict['records']:
         dict = i['fields']
         dataset.append(dict)
    return render_template('project-slideshow.html', entries = dataset)

@app.route("/news")
@login_required
def news():

    r = requests.get('https://api.airtable.com/v0/appHwbaV8AGAurNlN/BBC%20News?api_key=key3P4gTMtrDY1ylx')
    dict = r.json()
    dataset = []
    for i in dict['records']:
            dict = i['fields']
            dataset.append(dict)

    return render_template('portfolio.html', entries=dataset)

@app.route('/image')
@login_required
def image():
    return render_template('project-image.html')

@app.route('/blog')
@login_required
def blog():
    return render_template('blog.html')

@app.route('/archives')
@login_required
def archives():
    return render_template('archives.html')

@app.route('/contact')
@login_required
def contact():
    return render_template('contact.html')

@app.route("/chart")
@login_required
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

@app.route("/login")
def login():
    message = '请先登录。'
    return render_template('login.html', message=message)

@app.route("/process",methods=['POST'])
def process():
    username = request.form['username']
    password = request.form['password']

    headers = {
    'Authorization': 'Bearer key3P4gTMtrDY1ylx',
    }

    filter = 'IF(AND({UserName}="'+username+'",{Pwd}="'+password+'"), 1, 0)'

    params = (
        ('view', 'Grid view'),
        ('filterByFormula', filter),
    )

    r = requests.session()
    r = requests.get('https://api.airtable.com/v0/appXOWj6C41XPBzeP/1?api_key=key3P4gTMtrDY1ylx', headers=headers, params=params)
    dict = r.json()
    print(dict)
    dataset = []
    for i in dict['records']:
         dict = i['fields']
         dataset.append(dict)
    for item in dataset:
        user = item.get('UserName')
        pwd = item.get('Pwd')

    if  username == user and password == pwd:
         login_user(User(1))
         message = "亲爱的 " + username + ", 终于等到您！"
         return render_template('index.html', message=message)
    message = '密码错误！'
    return render_template('login.html', message=message)

@app.route('/logout')
@login_required
def logout():
    logout_user()
    message = '感谢登出！'
    return render_template('login.html',message=message)

if __name__ == '__main__':
   app.run(debug = True)
