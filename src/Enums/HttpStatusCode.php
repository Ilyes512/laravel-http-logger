<?php

declare(strict_types=1);

namespace Ilyes512\HttpLogger\Enums;

use BackedEnum;
use Ilyes512\EnumUtils\HasBackedEnumUtils;

/**
 * This enum is (heavily) based on the http code data in Symfony\Component\HttpFoundation\Response.
 *
 * @implements BackedEnum<int>
 */
enum HttpStatusCode: int
{
    /** @use HasBackedEnumUtils<int> */
    use HasBackedEnumUtils;

    case HTTP_CONTINUE = 100;
    case HTTP_SWITCHING_PROTOCOLS = 101;
    case HTTP_PROCESSING = 102; // RFC2518
    case HTTP_EARLY_HINTS = 103; // RFC8297
    case HTTP_OK = 200;
    case HTTP_CREATED = 201;
    case HTTP_ACCEPTED = 202;
    case HTTP_NON_AUTHORITATIVE_INFORMATION = 203;
    case HTTP_NO_CONTENT = 204;
    case HTTP_RESET_CONTENT = 205;
    case HTTP_PARTIAL_CONTENT = 206;
    case HTTP_MULTI_STATUS = 207; // RFC4918
    case HTTP_ALREADY_REPORTED = 208; // RFC5842
    case HTTP_IM_USED = 226; // RFC3229
    case HTTP_MULTIPLE_CHOICES = 300;
    case HTTP_MOVED_PERMANENTLY = 301;
    case HTTP_FOUND = 302;
    case HTTP_SEE_OTHER = 303;
    case HTTP_NOT_MODIFIED = 304;
    case HTTP_USE_PROXY = 305;
    case HTTP_RESERVED = 306;
    case HTTP_TEMPORARY_REDIRECT = 307;
    case HTTP_PERMANENTLY_REDIRECT = 308; // RFC7238
    case HTTP_BAD_REQUEST = 400;
    case HTTP_UNAUTHORIZED = 401;
    case HTTP_PAYMENT_REQUIRED = 402;
    case HTTP_FORBIDDEN = 403;
    case HTTP_NOT_FOUND = 404;
    case HTTP_METHOD_NOT_ALLOWED = 405;
    case HTTP_NOT_ACCEPTABLE = 406;
    case HTTP_PROXY_AUTHENTICATION_REQUIRED = 407;
    case HTTP_REQUEST_TIMEOUT = 408;
    case HTTP_CONFLICT = 409;
    case HTTP_GONE = 410;
    case HTTP_LENGTH_REQUIRED = 411;
    case HTTP_PRECONDITION_FAILED = 412;
    case HTTP_REQUEST_ENTITY_TOO_LARGE = 413;
    case HTTP_REQUEST_URI_TOO_LONG = 414;
    case HTTP_UNSUPPORTED_MEDIA_TYPE = 415;
    case HTTP_REQUESTED_RANGE_NOT_SATISFIABLE = 416;
    case HTTP_EXPECTATION_FAILED = 417;
    case HTTP_I_AM_A_TEAPOT = 418; // RFC2324
    case HTTP_MISDIRECTED_REQUEST = 421; // RFC7540
    case HTTP_UNPROCESSABLE_ENTITY = 422; // RFC4918
    case HTTP_LOCKED = 423; // RFC4918
    case HTTP_FAILED_DEPENDENCY = 424; // RFC4918
    case HTTP_TOO_EARLY = 425; // RFC-ietf-httpbis-replay-04
    case HTTP_UPGRADE_REQUIRED = 426; // RFC2817
    case HTTP_PRECONDITION_REQUIRED = 428; // RFC6585
    case HTTP_TOO_MANY_REQUESTS = 429; // RFC6585
    case HTTP_REQUEST_HEADER_FIELDS_TOO_LARGE = 431; // RFC6585
    case HTTP_UNAVAILABLE_FOR_LEGAL_REASONS = 451; // RFC7725
    case HTTP_INTERNAL_SERVER_ERROR = 500;
    case HTTP_NOT_IMPLEMENTED = 501;
    case HTTP_BAD_GATEWAY = 502;
    case HTTP_SERVICE_UNAVAILABLE = 503;
    case HTTP_GATEWAY_TIMEOUT = 504;
    case HTTP_VERSION_NOT_SUPPORTED = 505;
    case HTTP_VARIANT_ALSO_NEGOTIATES_EXPERIMENTAL = 506; // RFC2295
    case HTTP_INSUFFICIENT_STORAGE = 507; // RFC4918
    case HTTP_LOOP_DETECTED = 508; // RFC5842
    case HTTP_NOT_EXTENDED = 510; // RFC2774
    case HTTP_NETWORK_AUTHENTICATION_REQUIRED = 511; // RFC6585

    /**
     * Original source:
     * {@link https://www.iana.org/assignments/http-status-codes/http-status-codes.xhtml Hypertext Transfer Protocol (HTTP) Status Code Registry}
     *
     * Unless otherwise noted, the status code is defined in RFC2616.
     */
    public function getDescription(): string
    {
        return match ($this->value) {
            // Informational
            100 => 'Continue',
            101 => 'Switching Protocols',
            102 => 'Processing', // RFC2518
            103 => 'Early Hints',
            200 => 'OK',

            // Successfull
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            207 => 'Multi-Status', // RFC4918
            208 => 'Already Reported', // RFC5842
            226 => 'IM Used', // RFC3229

            // Redirection
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            306 => '(Unused)', // RFC9110: The 306 status code was defined in a previous version of this specification, is no longer used, and the code is reserved.
            307 => 'Temporary Redirect',
            308 => 'Permanent Redirect', // RFC7238

            // Client Error
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Content Too Large', // RFC-ietf-httpbis-semantics
            414 => 'URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Range Not Satisfiable',
            417 => 'Expectation Failed',
            418 => 'I\'m a teapot', // RFC2324
            421 => 'Misdirected Request', // RFC7540
            422 => 'Unprocessable Content', // RFC-ietf-httpbis-semantics
            423 => 'Locked', // RFC4918
            424 => 'Failed Dependency', // RFC4918
            425 => 'Too Early', // RFC-ietf-httpbis-replay-04
            426 => 'Upgrade Required', // RFC2817
            428 => 'Precondition Required', // RFC6585
            429 => 'Too Many Requests', // RFC6585
            431 => 'Request Header Fields Too Large', // RFC6585
            451 => 'Unavailable For Legal Reasons', // RFC7725

            // Server Error
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported',
            506 => 'Variant Also Negotiates', // RFC2295
            507 => 'Insufficient Storage', // RFC4918
            508 => 'Loop Detected', // RFC5842
            510 => 'Not Extended', // RFC2774
            511 => 'Network Authentication Required', // RFC6585
        };
    }

    public function isInformational(): bool
    {
        return $this->isBetween(100, 199);
    }

    /**
     * @return list<HttpStatusCode>
     */
    public static function allInformational(): array
    {
        return [
            self::HTTP_CONTINUE,
            self::HTTP_SWITCHING_PROTOCOLS,
            self::HTTP_PROCESSING,
            self::HTTP_EARLY_HINTS,
        ];
    }

    public function isSuccessful(): bool
    {
        return $this->isBetween(200, 299);
    }

    /**
     * @return list<HttpStatusCode>
     */
    public static function allSuccessful(): array
    {
        return [
            self::HTTP_OK,
            self::HTTP_CREATED,
            self::HTTP_ACCEPTED,
            self::HTTP_NON_AUTHORITATIVE_INFORMATION,
            self::HTTP_NO_CONTENT,
            self::HTTP_RESET_CONTENT,
            self::HTTP_PARTIAL_CONTENT,
            self::HTTP_MULTI_STATUS,
            self::HTTP_ALREADY_REPORTED,
            self::HTTP_IM_USED,
        ];
    }

    public function isRedirection(): bool
    {
        return $this->isBetween(300, 299);
    }

    /**
     * @return list<HttpStatusCode>
     */
    public static function allRedirection(): array
    {
        return [
            self::HTTP_MULTIPLE_CHOICES,
            self::HTTP_MOVED_PERMANENTLY,
            self::HTTP_FOUND,
            self::HTTP_SEE_OTHER,
            self::HTTP_NOT_MODIFIED,
            self::HTTP_USE_PROXY,
            self::HTTP_RESERVED,
            self::HTTP_TEMPORARY_REDIRECT,
            self::HTTP_PERMANENTLY_REDIRECT,
        ];
    }

    public function isClientError(): bool
    {
        return $this->isBetween(400, 499);
    }

    /**
     * @return list<HttpStatusCode>
     */
    public static function allClientError(): array
    {
        return [
            self::HTTP_BAD_REQUEST,
            self::HTTP_UNAUTHORIZED,
            self::HTTP_PAYMENT_REQUIRED,
            self::HTTP_FORBIDDEN,
            self::HTTP_NOT_FOUND,
            self::HTTP_METHOD_NOT_ALLOWED,
            self::HTTP_NOT_ACCEPTABLE,
            self::HTTP_PROXY_AUTHENTICATION_REQUIRED,
            self::HTTP_REQUEST_TIMEOUT,
            self::HTTP_CONFLICT,
            self::HTTP_GONE,
            self::HTTP_LENGTH_REQUIRED,
            self::HTTP_PRECONDITION_FAILED,
            self::HTTP_REQUEST_ENTITY_TOO_LARGE,
            self::HTTP_REQUEST_URI_TOO_LONG,
            self::HTTP_UNSUPPORTED_MEDIA_TYPE,
            self::HTTP_REQUESTED_RANGE_NOT_SATISFIABLE,
            self::HTTP_EXPECTATION_FAILED,
            self::HTTP_I_AM_A_TEAPOT,
            self::HTTP_MISDIRECTED_REQUEST,
            self::HTTP_UNPROCESSABLE_ENTITY,
            self::HTTP_LOCKED,
            self::HTTP_FAILED_DEPENDENCY,
            self::HTTP_TOO_EARLY,
            self::HTTP_UPGRADE_REQUIRED,
            self::HTTP_PRECONDITION_REQUIRED,
            self::HTTP_TOO_MANY_REQUESTS,
            self::HTTP_REQUEST_HEADER_FIELDS_TOO_LARGE,
            self::HTTP_UNAVAILABLE_FOR_LEGAL_REASONS,
        ];
    }

    public function isServerError(): bool
    {
        return $this->isBetween(500, 599);
    }

    /**
     * @return list<HttpStatusCode>
     */
    public static function allServerError(): array
    {
        return [
            self::HTTP_INTERNAL_SERVER_ERROR,
            self::HTTP_NOT_IMPLEMENTED,
            self::HTTP_BAD_GATEWAY,
            self::HTTP_SERVICE_UNAVAILABLE,
            self::HTTP_GATEWAY_TIMEOUT,
            self::HTTP_VERSION_NOT_SUPPORTED,
            self::HTTP_VARIANT_ALSO_NEGOTIATES_EXPERIMENTAL,
            self::HTTP_INSUFFICIENT_STORAGE,
            self::HTTP_LOOP_DETECTED,
            self::HTTP_NOT_EXTENDED,
            self::HTTP_NETWORK_AUTHENTICATION_REQUIRED,
        ];
    }

    private function isBetween(int $lowerIncluding, int $higherIncluding): bool
    {
        return $this->value >= $lowerIncluding && $this->value <= $higherIncluding;
    }
}
