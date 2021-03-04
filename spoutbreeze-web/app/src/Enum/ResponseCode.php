<?php

/**
 * SpoutBreeze open source platform - https://www.spoutbreeze.org/
 *
 * Copyright (c) 2021 Frictionless Solutions Inc., RIADVICE SUARL and by respective authors (see below).
 *
 * This program is free software; you can redistribute it and/or modify it under the
 * terms of the GNU Lesser General Public License as published by the Free Software
 * Foundation; either version 3.0 of the License, or (at your option) any later
 * version.
 *
 * SpoutBreeze is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License along
 * with SpoutBreeze; if not, see <http://www.gnu.org/licenses/>.
 */

namespace Enum;

class ResponseCode extends Enum
{
    const HTTP_OK                    = 200;
    const HTTP_NO_CONTENT            = 204;
    const HTTP_BAD_REQUEST           = 400;
    const HTTP_UNAUTHORIZED          = 401;
    const HTTP_FORBIDDEN             = 403;
    const HTTP_NOT_FOUND             = 404;
    const HTTP_UNPROCESSABLE_ENTITY  = 422;                                        // RFC4918
    const HTTP_INTERNAL_SERVER_ERROR = 500;
}
