<form wire:submit.prevent="login" method="POST">
    @csrf

    @if ($error != null)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @endif
        <!-- Email input -->

        <div class="form-outline mb-4">
            <label class="form-label" for="username">Email/Phone Number</label>
            <input type="text" id="username" class="form-control" wire:model="username" />
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="password">Password</label>
            <input type="password" id="password" class="form-control" wire:model="password" />
        </div>

        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
            <div class="col d-flex justify-content-start">
                <!-- Checkbox -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form2Example31" />
                    <label class="form-check-label" for="form2Example31"> Remember me </label>
                </div>
            </div>
        </div>

        <!-- Submit button -->
        <button type="submit" class="site-btn w-100">Sign in</button>
</form>
