# Importamos las librerías de Flask
from flask import Flask, render_template, request

#importamis una libreria de mysql para flask
from flask_mysqldb import MySQL

#importamos la libreria para generar hash y para probar que el hash coincida con la contraseña
from werkzeug.security import generate_password_hash, check_password_hash

#

# Creamos la instancia del proyecto
app = Flask(__name__)

#permite cargar las vistas cuando se modifican
app.config["TEMPLATES_AUTO_RELOAD"] = True

#configuracion de la conexion
app.config['MySQL_HOST'] = 'localhost'
app.config['MySQL_USER'] = 'root'
app.config['MySQL_PASSWORD'] = ''
app.config['MySQL_DB'] = 'dbflask'
app.secret_key = 'mysecretkey'

mysql = MySQL(app)

# Ruta raíz
@app.route("/")
def home():
    return render_template("login.html")

@app.route("/registro", methods=["GET", "POST"])
def registro():
    if request.method == "POST":
        nombre = request.form["nombre"]
        apellido_p = request.form["apellido_p"]
        apellido_m = request.form["apellido_m"]
        correo = request.form["correo"]
        password = request.form["password_hash"]
        id_rol = request.form["id_rol"]

        #generamos un hash a partir de la contraseña 
        password = generate_password_hash(password)
# Ejecutar la aplicación
if __name__ == "__main__":
    app.run(port=5000, debug=True)




