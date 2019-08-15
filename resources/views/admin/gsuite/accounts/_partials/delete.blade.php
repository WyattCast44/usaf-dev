<form action="{{ route('admin.gsuite.accounts.delete') }}" method="post" class="tw-inline-block">
    @csrf
    
    <input type="hidden" name="email" id="email" value="{{ $account->primaryEmail }}">

    <button type="submit" class="btn btn-link tw-px-2 tw-py-0" title="Delete account">
        @svg('trash')
    </button>

</form>