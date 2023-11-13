@props(['notes', 'pinNotes', 'otherNotes'])
<x-layout>
    <x-create-note-section />
    <x-filter />
    <x-notes-section :notes="$notes" :pinNotes="$pinNotes" :otherNotes="$otherNotes"/>
</x-layout>