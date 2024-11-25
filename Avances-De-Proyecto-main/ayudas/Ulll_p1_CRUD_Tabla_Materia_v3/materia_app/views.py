from django.shortcuts import render,redirect
from .models import Materia
# Create your views here.


def inicio_vista(request):
    # obtener todos los registros de la tabla materia
    listadomaterias=Materia.objects.all()
    return render(request,"gestionarmaterias.html",{"lasmaterias":listadomaterias})


def registrarmateria(request):
    codigo=request.POST["txtcodigo"]
    nombre=request.POST["txtnombre"]
    creditos=request.POST["txtcreditos"]

    guardarmateria=Materia.objects.create(codigo=codigo,nombre=nombre, creditos=creditos)
    return redirect("/")

#editar materias
def editarmateria(request):
    codigo=request.POST["txtcodigo"]
    nombre=request.POST["txtnombre"]
    creditos=request.POST["txtcreditos"]
    materia=Materia.objects.get(codigo=codigo)
    materia.nombre=nombre
    materia.creditos=creditos
    materia.save()
    return redirect("/")


#seleccionar materia
def seleccionarmateria(request,codigo):
    materia=Materia.objects.get(codigo=codigo)
    return render(request,"editarmateria.html",{"mismaterias":materia})

#borrar materia
def borrarmateria(request,codigo):
    materia=Materia.objects.get(codigo=codigo)
    materia.delete()
    return redirect("/")
