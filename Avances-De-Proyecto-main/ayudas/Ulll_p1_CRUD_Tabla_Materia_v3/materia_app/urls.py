from django.urls import path
from materia_app import views

urlpatterns = [
    path("",views.inicio_vista,name="views.inicio_vista"),
    path("registrarmateria/",views.registrarmateria, name="registrarmateria"),
    path("seleccionarmateria/<codigo>",views.seleccionarmateria, name="seleccionarmateria"),
    path("editarmateria/",views.editarmateria, name="editarmateria"),
    path("borrarmateria/<codigo>",views.borrarmateria,name="borrarmateria")

]
