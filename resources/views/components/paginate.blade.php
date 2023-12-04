<div class="container w-2/12 text-white">
    <select class=" p-3 rounded bg-indigo-400 uppercase" name="paginate" id="paginate">
        <option selected disabled>choose your number</option>
        <option value="3">3</option>
        <option value="6">6</option>
        <option value="9">9</option>
        <option value="12">12</option>
        <option value="15">15</option>
    </select>
</div>
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
