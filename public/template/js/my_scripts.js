$(function(){
    $('#dataTable').dataTable({
        "ordering": true,
        language: {
            "lengthMenu": "Mostrar _MENU_ registos",
            "search": "Procurar:",
            "info": "Mostrando os registros _START_ a _END_ num total de _TOTAL_",
            "paginate": {
                "first": "Primeiro",
                "previous": "Anterior",
                "next": "Seguinte",
                "last": "Último"
            },
            "zeroRecords": "Não foram encontrados resultados",
        }
      });
})
