@props(['name'])
<x-form.input-wrapper>
    <x-form.label :name="$name"/>
    <textarea id="{{ $name }}" name="{{ $name }}" id="" cols="30" rows="10" class="form-control">{{ old($name) }}</textarea>
    <x-error name="{{ $name }}"/>
</x-form.input-wrapper>