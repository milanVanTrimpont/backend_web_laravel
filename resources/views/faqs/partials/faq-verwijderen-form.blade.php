<!-- faq verwijderen -->
</section>
    <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je deze FAQ wilt verwijderen?');">
        @csrf
        @method('DELETE')
        <x-danger-button>Verwijder</x-danger-button>
    </form>
    <br>
</section