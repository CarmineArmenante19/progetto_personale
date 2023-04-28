<form action="{{route('language.select',$lang)}}" method="GET">
@csrf
<button type="submit" class="btn">
<img src="{{asset('vendor/blade-flags/language-' . $lang . '.svg')}}" class="bandiere" alt="bandiere">
</button>
</form>