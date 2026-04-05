<x-layout>
    <x-slot:title>
        Profile
    </x-slot:title>

    <div class="profile">
        <div class="left">
            <span>user.email@example.com</span>
            <img src="https://placehold.co/400x400/000000/000000?text=f" alt="Profile picture">
        </div>
        <div class="content">
            <h1 class="name">Bakery</h1>
            <h2 class="text">Welcome Back!</h2>

            <div class="row">
                <x-profile-input label="First Name" type="text" value="John" name="firstName"></x-profile-input>
                <x-profile-input label="Last Name" type="text" value="Wick" name="lastName"></x-profile-input>
            </div>

            <div class="row">
                <x-profile-input label="Email" type="email" value="user.email@example.com" name="email"></x-profile-input>
                <x-profile-input label="Contact Number" type="tel" value="+421984378328" name="contactNumber"></x-profile-input>
            </div>

            <div class="row">
                <x-profile-input label="Birthdate" type="text" placeholder="DD" name="day"></x-profile-input>
                <x-profile-input type="text" placeholder="MM" name="month"></x-profile-input>
                <x-profile-input type="text" placeholder="YYYY" name="year"></x-profile-input>
            </div>

            <fieldset class="gender-input">
                <input type="radio" id="male" checked />
                <label for="male">Male</label>
                <input type="radio" id="female" />
                <label for="female">Female</label>
                <input type="radio" id="other" />
                <label for="other">Other</label>
            </fieldset>
        </div>
    </div>
</x-layout>