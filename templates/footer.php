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

<script>
  $(document).ready( function() {
  $("#tabla_id").DataTable({
    "pagesLength": 3,
    lengthMenu: [
      [3,10,25,50],
      [3,10,25,50]

    ],
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
    }
  });
  });
</script>



