 <!--estilo del footer-->
 <style>
/*footer*/
.containerFooter, footer, footer h3 {
    align-self: flex-end;
    width: 100%;
    background-color: #3f3434;
    color: #fff;
    font-weight: bolder;
}
 </style>

 <!--inicio de footer-->
  <div class=" containerFooter mt-5">
  <footer class="py-3 my-4">
    <h3 class="nav justify-content-center">PetBosco Colegio Don Bosco 2023</h3>
  </footer>
</div>
<!--fin de footer-->



</body>
</html>

<!--script para usar jquery para ordenar la parte de expedientes-->
<script>
  $(document).ready(function() {
    $("#tabla_id").DataTable({
      "pageLength":3,
      lenghMenu:[
        [3, 10, 25]
      ],
      "language": {
        "url": "https://cdn.datatables.net/plug-ins/1.13/i18n/ES-.json"
      }
    });
  })
</script>

