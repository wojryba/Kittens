<?php

namespace App\Request;

use App\Http\RequestDTOInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

class GetKittensRequest implements RequestDTOInterface
{
    /**
     * @var Request
     */
    protected $origin;

    /**
     * @var string
     */
    protected $status;

    /**
     * @Assert\Type(
     *     type = "integer",
     *     message = "Passed value must be an int",
     * )
     * @Assert\GreaterThan(0)
     * @var int
     */
    protected $amount;

    /**
     * GetKittensRequest constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->setOrigin($request);
        $this->page = $request->get('page', 1);
        $this->limit = $request->get('limit', 10);
        $this->amount = $request->get('amount', 10);
    }

    /**
     * @return Request
     */
    public function getOrigin(): Request
    {
        return $this->origin;
    }

    /**
     * @param Request $origin
     */
    public function setOrigin(Request $origin): void
    {
        $this->origin = $origin;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return int
     */
    public function getAmount() : int {
        return $this->amount;
    }
}