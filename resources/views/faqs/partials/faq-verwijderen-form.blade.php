<!-- faq verwijderen -->
</section>
    <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je deze FAQ wilt verwijderen?');">
        @csrf
        @method('DELETE')
        <x-primary-button type="submit" style="color: red; text-decoration: none;">Verwijder</x-primary-button>
    </form>
</section