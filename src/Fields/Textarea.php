<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use InvalidArgumentException;
use WordPlate\Acf\Fields\Attributes\DefaultValue;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\Placeholder;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\Wrapper;

class Textarea extends Field
{
    use DefaultValue, Instructions, Placeholder, Required, Wrapper;

    protected $type = 'textarea';

    public function characterLimit(int $limit): self
    {
        $this->config->set('maxlength', $limit);

        return $this;
    }

    public function newLines(string $newLines): self
    {
        if (!in_array($newLines, ['br', 'wpautop'])) {
            throw new InvalidArgumentException("Invalid argument new lines [$newLines].");
        }

        $this->config->set('new_lines', $newLines);

        return $this;
    }

    public function rows(int $rows): self
    {
        $this->config->set('rows', $rows);

        return $this;
    }
}
