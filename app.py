from flask import Flask
from flask_sqlalchemy import SQLAlchemy
app = Flask(__name__)
app.config['SECRET_KEY'] = '123456'
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql://root:''@localhost/mentalhealthwebsite'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS']=False
db = SQLAlchemy(app)

# class Example(db.Model):
# 	__tablename__ = 'example'
# 	id = db.Column('id', db.Integer, primary_key=True)
# 	data = db.Column('data', db.String(100))

class Student(db.Model):
	#__tablename__ ='Student'
	Student_id = db.Column(db.Integer, primary_key=True,autoincrement=True)
	Password = db.Column(db.String(50),nullable=False)
	Grade = db.Column(db.Integer,nullable=False)
	Fname = db.Column(db.String(50),nullable=False)
	Lname = db.Column(db.String(50),nullable=False)
	Birthdate = db.Column(db.Date,nullable=False)
	Address = db.Column(db.String(50),nullable=False)
	City = db.Column(db.String(50),nullable=False)
	State = db.Column(db.String(50),nullable=False)
	Zip = db.Column(db.Integer,nullable=False)
	guardian=db.relationship('Guardian',backref='guardian',uselist=False)
	comments = db.relationship('Comments', backref='Comments', lazy=True)
	response = db.relationship('Response', backref='response', lazy=True)

class Course(db.Model):
	#__tablename__ = 'Course'
	Course_id = db.Column(db.Integer, primary_key=True,autoincrement=True)
	Course_name = db.Column(db.String(50),nullable=False)
	Staff = db.relationship('Staff', backref='course', lazy=True)

class Staff(db.Model):
	#__tablename__ = 'Staff'
	Staff_id = db.Column(db.Integer, primary_key=True,autoincrement=True)
	Course_id = db.Column(db.Integer,db.ForeignKey('course.Course_id'),nullable=False)
	Fname = db.Column(db.String(50),nullable=False)
	Lname = db.Column(db.String(50),nullable=False)
	Email= db.Column(db.String(50),nullable=False)
	Password = db.Column(db.String(50),nullable=False)

class Test(db.Model):
	#__tablename__ = 'Test'
	Test_id = db.Column(db.Integer, primary_key=True,autoincrement=True)
	Test_name = db.Column(db.String(20),nullable=False)
	question = db.relationship('Question', backref='question', lazy=True)
	response = db.relationship('Response', backref='response', lazy=True)

class Question(db.Model):
	#__tablename__ = 'Question'
	Question_id = db.Column(db.Integer, primary_key=True,autoincrement=True)
	Test_id = db.Column(db.Integer,db.ForeignKey('test.Test_id'),nullable=False)
	Question= db.Column(db.String(250),nullable=False)
	Answer1= db.Column(db.String(250),nullable=False)
	Answer1_points= db.Column(db.Integer,nullable=False)	
	Answer2= db.Column(db.String(250),nullable=False)
	Answer2_points= db.Column(db.Integer,nullable=False)	
	Answer3= db.Column(db.String(250),nullable=False)
	Answer3_points= db.Column(db.Integer,nullable=False)
	response = db.relationship('Response', backref='response', lazy=True)


class Response(db.Model):
	#__tablename__ = 'Response'
	Response_id = db.Column(db.Integer, primary_key=True,autoincrement=True)
	Student_id = db.Column(db.Integer,db.ForeignKey('student.Student_id'),nullable=False)
	Test_id = db.Column(db.Integer,db.ForeignKey('test.Test_id'),nullable=False)
	Question_id = db.Column(db.Integer,db.ForeignKey('question.Question_id'),nullable=False)
	Response=db.Column(db.String(250),nullable=False)
	Score=db.Column(db.Integer,nullable=False)
	Recommendation=db.Column(db.String(250),nullable=True)

class Comments(db.Model):
	#__tablename__ = 'Comments'
	Comment_id = db.Column(db.Integer, primary_key=True,autoincrement=True)
	Student_id = db.Column(db.Integer,db.ForeignKey('student.Student_id'))
	Staff_id = db.Column(db.Integer,db.ForeignKey('staff.Staff_id'))
	Comments=db.Column(db.String(250),nullable=True)
	Date = db.Column(db.Date,nullable=True)
	

class Guardian(db.Model):
	#__tablename__ = 'Guardian'
	Guardian_id = db.Column(db.Integer, primary_key=True,autoincrement=True)
	Student_id = db.Column(db.Integer,db.ForeignKey('student.Student_id'),nullable=False)
	Relation = db.Column(db.String(1),nullable=False)
	Fname = db.Column(db.String(50),nullable=False)
	Lname = db.Column(db.String(50),nullable=False)
	Phone=db.Column(db.String(50),nullable=False)
	Email= db.Column(db.String(50),nullable=False)
	Workphone=db.Column(db.String(50),nullable=True)
	Address = db.Column(db.String(100),nullable=False)
	City = db.Column(db.String(50),nullable=False)
	State = db.Column(db.String(50),nullable=False)
	Zip = db.Column(db.Integer,nullable=False)	









@app.route("/")
def main():
    return "Welcome to the telehealth app!! hello"
if __name__ == "__main__":
    app.run()