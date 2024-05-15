//Iniciar los eventos en JQuery
$(function(){
    // Define los eventos a trabajar en la página

    // Evento click del botón mostrar de la página listar_producto.php
    $(".reg_producto .btn_mostrar").click(function(e) {
        let codprod = $(this).closest(".reg_producto").children(".codprod").text();

        location.href = "mostrar_producto.php?codprod=" + codprod;
    });

    // Evento click del botón borrar de la página Listar_producto.php
    $(".reg_producto .btn_borrar").click(function(e){
        let codprod = $(this).closest(".reg_producto").children(".codprod").text();
        let prod = $(this).closest(".reg_producto").children(".prod").text();

        $("#md_borrar .lbl_codprod").text(codprod);
        $("#md_borrar .lbl_prod").text(prod);

        $("#md_borrar .btn_borrar").attr("href", "../controlador/ctr_borrar_prod.php?codprod=" + codprod);

        $("#md_borrar").modal("show");
    });
    
    // Evento focusout (perder el enfoque) del cuadro de texto de la página consultar_producto
    $("#frm_consultar_prod #txt_codprod").focusout(function(e){
        e.preventDefault();
        let codprod = $(this).val();

        if(codprod!=""){
            $.ajax({
                url:"../controlador/ctr_consultar_prod.php",
                type:"POST",
                data:{codprod:codprod},
                success:function(rpta){
                    console.log(rpta);
                    let rp = JSON.parse(rpta);
                    if(rp){
                        $(".prod").html(rp.producto);
                        $(".stk").html(rp.stock_disponible);
                        $(".cst").html("S/"+rp.costo);
                        $(".prc").html(rp.precio);
                        $(".gnc").html(rp.ganancia);
                        $(".mar").html(rp.marca);
                        $(".cat").html(rp.categoria);
                    }else{
                        $('#mimodal3').modal('show');
                        $("#mensajeAlerta2").html("El codigo " + codprod+ " no existe").show();
                        $("#txt_codprod").val("");
                        let vacio = "&nbsp;";
                        $(".prod").html(vacio);
                        $(".stk").html(vacio);
                        $(".cst").html(vacio);
                        $(".prc").html(vacio);
                        $(".gnc").html(vacio);
                        $(".mar").html(vacio);
                        $(".cat").html(vacio);

                        $("#txt_codprod").focus();

                    }
                }
            })
        }
    })
    // Evento click del botón filtrar de la página filtrar_producto.php
    $("#frm_filtrar_prod #btn_filtrar").on("click", function (e) {
        e.preventDefault();

        var valor = $("#txt_valor").val();

        if (valor != "") {
            $.post("../controlador/ctr_filtrar_prod.php",
                { valor: valor },
                function (rpta) {
                    
                    $("#tabla").html(rpta);
                    $("#md_lista").modal("show");
                });
        } else {
            $("#tabla").html("");
            
            $("#md_vacio").modal("show");

            $("#txt_valor").focus();
        }
    });
    // Evento click del botón editar de la página listar_producto.php
    $(".reg_producto .btn_editar").click(function(e){
        let codprod = $(this).closest(".reg_producto").children(".codprod").text();

        location.href = "editar_producto.php?codprod=" + codprod;
    });

});

