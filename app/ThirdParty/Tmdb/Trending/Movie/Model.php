<?php
declare(strict_types=1);

namespace App\ThirdParty\Tmdb\Trending\Movie;

use Tmdb\Model\AbstractModel as TmdbAbstractModel;

class Model extends TmdbAbstractModel
{
    /**
     * List of properties to populate by the ObjectHydrator
     *
     * @var array
     */
    public static $properties = [
        'id',
    ];

    private $id;

    /**
     * Retrieve movie id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set movie id
     *
     * @param mixed $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = (int)$id;

        return $this;
    }
}

