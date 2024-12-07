<form class="lockscreen-credentials" method="POST" action="{{ route('unlock') }}">
    @csrf
    <div class="input-group">
        <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}" readonly>
        <input type="password" class="form-control" name="password" placeholder="Password">
        <div class="input-group-append">
            <button type="submit" class="btn">
                <i class="fas fa-arrow-right text-muted"></i>
            </button>
        </div>
    </div>
</form>

<script>
    let timeout = 5 * 60 * 1000; // 15 minutes
    let timer;

    document.onmousemove = resetTimer;
    document.onkeypress = resetTimer;

    function resetTimer() {
        clearTimeout(timer);
        timer = setTimeout(() => {
            window.location.href = "{{ route('lockscreen') }}";
        }, timeout);
    }

    resetTimer();
</script>
