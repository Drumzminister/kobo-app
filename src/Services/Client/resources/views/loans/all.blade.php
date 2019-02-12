@extends('client::layouts.app')

@section("content")
    <section id="top">
        <div class="container py-3">
            <div class="row ">
                <h2>Loans</h2>
                @include('client::accountant-button')
            </div>
        </div>
    </section>
	<all-loans></all-loans>
    
    {{--Loan Details Modal--}}
    @include('client::loans._loans_details')

@endsection
@section('other_js')
	<script>
        window._sources = @json($loanSources);
		window._loans = @json($loans)
	</script>
@endsection
