<?php

namespace AdamDBurton\Destiny2ApiClient\Module;

use AdamDBurton\Destiny2ApiClient\Exception\Api\AccessTokenRequired;
use AdamDBurton\Destiny2ApiClient\Exception\Http\ApiUnavailable;
use AdamDBurton\Destiny2ApiClient\Exception\Http\BadRequest;
use AdamDBurton\Destiny2ApiClient\Exception\Http\HttpException;
use AdamDBurton\Destiny2ApiClient\Exception\Http\ResourceNotFound;
use AdamDBurton\Destiny2ApiClient\Exception\Http\Unauthorized;
use AdamDBurton\Destiny2ApiClient\Exception\Validation\InvalidMembershipId;
use AdamDBurton\Destiny2ApiClient\Exception\Validation\InvalidMembershipType;
use AdamDBurton\Destiny2ApiClient\Module;
use AdamDBurton\Destiny2ApiClient\Response;

/**
 * @package AdamDBurton\Destiny2ApiClient\Module
 */
class User extends Module
{
    /**
     * @param $membershipId
     * @return Response
     * @throws ApiUnavailable
     * @throws BadRequest
     * @throws HttpException
     * @throws ResourceNotFound
     * @throws Unauthorized
     * @throws InvalidMembershipId
     */
    public function getBungieNetUserById($membershipId)
    {
        $this->assertIsMembershipId($membershipId);

        return $this->request('User/GetBungieNetUserById/' . $membershipId)->get();
    }

    /**
     * @param $membershipId
     * @return Response
     * @throws ApiUnavailable
     * @throws BadRequest
     * @throws HttpException
     * @throws ResourceNotFound
     * @throws Unauthorized
     * @throws InvalidMembershipId
     */
    public function getUserByAliases($membershipId)
    {
        $this->assertIsMembershipId($membershipId);

        return $this->request('User/GetUserAliases/' . $membershipId)->get();
    }

    /**
     * @param $search
     * @return Response
     * @throws ApiUnavailable
     * @throws BadRequest
     * @throws ResourceNotFound
     * @throws Unauthorized
     * @throws HttpException
     */
    public function searchUsers($search)
    {
        return $this->request('User/SearchUsers/')
            ->withParams(['q' => $search])
            ->get();
    }

    /**
     * @return Response
     * @throws ApiUnavailable
     * @throws BadRequest
     * @throws HttpException
     * @throws ResourceNotFound
     * @throws Unauthorized
     */
    public function getAvailableThemes()
    {
        return $this->request('User/GetAvailableThemes')->get();
    }

    /**
     * @param $membershipId
     * @param $membershipType
     * @return Response
     * @throws ApiUnavailable
     * @throws BadRequest
     * @throws HttpException
     * @throws InvalidMembershipId
     * @throws ResourceNotFound
     * @throws Unauthorized
     * @throws InvalidMembershipType
     */
    public function getMembershipDataById($membershipId, $membershipType)
    {
        $this->assertIsMembershipId($membershipId);
        $this->assertIsMembershipType($membershipType);

        return $this->request('User/GetMembershipDataById/' . $membershipId . '/' . $membershipType)->get();
    }

    /**
     * @return Response
     * @throws ApiUnavailable
     * @throws BadRequest
     * @throws HttpException
     * @throws ResourceNotFound
     * @throws Unauthorized
     * @throws AccessTokenRequired
     */
    public function getMembershipDataForCurrentUser()
    {
        $this->assertHasAccessToken();

        return $this->request('User/GetMembershipsForCurrentUser')->get();
    }

    /**
     * @param $membershipId
     * @return Response
     * @throws ApiUnavailable
     * @throws BadRequest
     * @throws HttpException
     * @throws ResourceNotFound
     * @throws Unauthorized
     * @throws InvalidMembershipId
     */
    public function getPartnerships($membershipId)
    {
        $this->assertIsMembershipId($membershipId);

        return $this->request('User/' . $membershipId . '/Partnerships')->get();
    }
}