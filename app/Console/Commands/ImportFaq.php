<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Faq;
use PhpOffice\PhpWord\IOFactory;


class ImportFaq extends Command
{
    protected $signature = 'faq:import';

    protected $description = 'Import FAQ dari file DOCX';

    public function handle()
    {
        $path = storage_path('app/faq/faq.docx');

        if (!file_exists($path)) {
            $this->error('File FAQ tidak ditemukan.');
            return;
        }

        $phpWord = IOFactory::load($path);

$text = '';

foreach ($phpWord->getSections() as $section) {

    $elements = $section->getElements();

    foreach ($elements as $element) {

        if (method_exists($element, 'getElements')) {

            foreach ($element->getElements() as $child) {

                if (method_exists($child, 'getText')) {
                    $text .= $child->getText() . "\n";
                }

            }

        } elseif (method_exists($element, 'getText')) {

            $text .= $element->getText() . "\n";

        }

    }

}

        $lines = explode("\n", $text);

        $question = null;

        foreach ($lines as $line) {

            $line = trim($line);

            if ($line == '') continue;

            if (str_contains(strtolower($line), 'jawab')) {

                $answer = trim(str_replace('Jawab:', '', $line));

                if ($question) {

                    Faq::create([
                        'question' => $question,
                        'answer' => $answer,
                        'keyword' => strtolower($this->extractKeyword($question))
                    ]);

                    $this->info("Import: $question");

                    $question = null;
                }
            } else {
                $question = $line;
            }
        }

        $this->info('FAQ berhasil diimport.');
    }

    private function extractKeyword($question)
    {
        $words = explode(' ', strtolower($question));
        return $words[0];
    }
}
