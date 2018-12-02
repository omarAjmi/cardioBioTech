<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>
        @if(empty($title))
            Panel
        @else
            {{ $title }}
        @endif
    </title>

   @include('admin.partials.styles.indexst')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

</head>

<body class="animsition">
    <div class="page-wrapper">
        @include('admin.partials.header_mob')
        @include('admin.partials.sidebar')
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            @include('admin.partials.header_desk')
            @yield('content')
        </div>
        <!-- END PAGE CONTAINER-->

    </div>
    @include('admin.partials.scripts.indexjs')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script !src="">
        $(document).ready( function () {
            $('#table_id').DataTable({
                "paging": false,
                language : {
                    processing:     "Traitement en cours...",
                    search:         "Rechercher&nbsp;:",
                    lengthMenu:    "Afficher _MENU_ &eacute;l&eacute;ments",
                    info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                    infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                    infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                    infoPostFix:    "",
                    loadingRecords: "Chargement en cours...",
                    zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                    emptyTable:     "Aucune donnée disponible dans le tableau",
                    paginate: {
                        first:      "Premier",
                        previous:   "Pr&eacute;c&eacute;dent",
                        next:       "Suivant",
                        last:       "Dernier"
                    },
                    aria: {
                        sortAscending:  ": activer pour trier la colonne par ordre croissant",
                        sortDescending: ": activer pour trier la colonne par ordre décroissant"
                    }
                }
            });
        });
    </script>
</body>

</html>
<!-- end document-->
