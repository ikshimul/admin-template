<form wire:submit.prevent='submit'>
    <x-custom-modal
        :has-button="false"
        modal-id="modalNewUser"
        on="openNewUserModal" 
        title="{{ $user_id ? 'Edit User' : 'Add New User' }}" 
        size="lg"
     >
    
         <x-form.input 
            type="text" 
            wire:model.lazy='name'
            id="txt_name" 
            label="Name" 
            placeholder="Enater Name" 
            :error="$errors->first('name')"
        />
            @if (!$user_id)
            <x-form.input 
                        type="email" 
                        wire:model.lazy='email'
                        id="txt_email" 
                        label="Email" 
                        placeholder="Email" 
                        :error="$errors->first('email')" 
                    />
            @else
            <x-form.input 
                        type="email" 
                        wire:model.lazy='email'
                        id="txt_email" 
                        label="Email" 
                        placeholder="Email" 
                        :error="$errors->first('email')" readonly
                    />
            @endif
        

        @if(!$user_id)
        <x-form.input 
            type="password" 
            wire:model.lazy='password'
            id="txt_pasword" 
            label="Password" 
            placeholder="Password" 
            :error="$errors->first('password')"
        />
        @endif
        @if(!($user_id == auth()->user()->id))       
        <x-form.select wire:model.live='role' :error="$errors->first('role')" id="txt_role" label="Role">
            <option value="">-Select Role-</option>
            @foreach($roles as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </x-form.select>
        @endif 
        @if(!($user_id == auth()->user()->id))       
        <x-form.check wire:model.live='active' id="txt_active" label="Active"/>
        @endif 
     <x-slot name="footer">
         <button type="submit" class="btn btn-primary">Save</button>
     </x-slot>
    </x-custom-modal>
</form>