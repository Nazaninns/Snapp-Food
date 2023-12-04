<script>
    $(document).ready(function(){
        var url = new URL(window.location.href);
        $("#paginate").on('change', function() {
            paginate = this.value;
            url.searchParams.set('paginate', paginate);
            window.location.replace(url.href);
        });
    });
</script>
{{--<script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>--}}
