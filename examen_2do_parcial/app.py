from flask import Flask, flash, render_template, request, redirect, url_for, session
#Importamos la librería de MySQL para flask
from flask_mysqldb import MySQL


#Creamos unas instancias del proyecto
app= Flask(__name__)

#Permite cargar las vistas cuando se modifican
app.config["TEMPLATES_AUTO_RELOAD"]=True

app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'crud_pape'

app.secret_key = 'mysecretkey'
mysql = MySQL(app)

#Creamos rutas
@app.route("/")
def index():
    con= mysql.connection.cursor()
    con.execute("SELECT * FROM tb_producto")
    conProductos = con.fetchall()
    print(conProductos)
    return render_template("index.html", productos=conProductos)

@app.route("/guardar", methods=["POST"])
def guardar():

    if request.method == "POST":
        nombre = request.form["Nombre"]
        descripcion = request.form["Descripcion"]
        precio = request.form["Precio"]
        stock = request.form["Stock"]
        print(nombre, descripcion, precio, stock)

        conn = mysql.connection.cursor()
        conn.execute('INSERT INTO tb_producto(nombre, descripcion, precio, stock) VALUES (%s, %s, %s, %s)', (nombre, descripcion, precio, stock))
        mysql.connection.commit()

    flash('El producto se ha guardado correctamente')
    return redirect(url_for("index"))

@app.route("/editar/<int:id>")
def editar(id):
    con = mysql.connection.cursor()
    con.execute("SELECT * FROM tb_producto WHERE id = %s", (id,))
    consultarId = con.fetchone()
    con.close()
    return render_template("editarProducto.html", producto=consultarId)

@app.route("/actualizar/<int:id>", methods=["POST"])
def actualizar(id):
    if request.method == "POST":
        nombre = request.form["Nombre"]
        descripcion = request.form["Descripcion"]
        precio = request.form["Precio"]
        stock = request.form["Stock"]

        conn = mysql.connection.cursor()
        conn.execute('UPDATE tb_producto SET nombre=%s, descripcion=%s, precio=%s, stock=%s WHERE id=%s', (nombre, descripcion, precio, stock, id))
        mysql.connection.commit()

    flash('El producto se ha actualizado correctamente')
    return redirect(url_for("index"))

@app.route("/eliminar/<int:id>")
def eliminar(id):
    con = mysql.connection.cursor()
    con.execute("DELETE FROM tb_producto WHERE id = %s", (id,))
    mysql.connection.commit()
    con.close()

    flash('El producto se ha eliminado correctamente')
    return redirect(url_for("index"))

#Ejecutamos el proyecto en el puerto 5000
if __name__ == "__main__":
    app.run(debug=True)
