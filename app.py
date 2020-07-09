from flask import Flask
from flask_sqlalchemy import SQLAlchemy
app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql://root:''@localhost/mentalhealth'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS']=False
db = SQLAlchemy(app)

class Example(db.Model):
	__tablename__ = 'example'
	id = db.Column('id', db.Integer, primary_key=True)
	data = db.Column('data', db.String(100))

@app.route("/")
def main():
    return "Welcome to the telehealth app"
if __name__ == "__main__":
    app.run()