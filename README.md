# Long running PHP process testing

Exploring running long processes via a web server. Goal is to implement something like the [Asynchronous Request-Reply pattern](https://learn.microsoft.com/en-us/azure/architecture/patterns/async-request-reply). Initially just exploring how to call an external PHP script from a web page, and getting this work on Heroku. Then will move to API and web clients so we can support long-running jobs in the browser. See also [REST API Design for Long-Running Tasks](https://restfulapi.net/rest-api-design-for-long-running-tasks/).

## Asynchronous Request-Reply pattern

```mermaid
sequenceDiagram
   client->>API endpoint: POST
   API endpoint->>client: HTTP 202 / Location
   Note over client,API endpoint:The client sends a request <br/>and receives an HTTP 202 (Accepted) response.
   client->>status endpoint:GET
   status endpoint-->>client:HTTP 200
   Note over client,status endpoint:The client sends an HTTP GET request to the status endpoint. <br/>The work is still pending, so this call returns HTTP 200.
   client->>status endpoint:GET
   status endpoint-->>client:HTTP 302 / Location
   Note over client,status endpoint:At some point, the work is complete and the status endpoint returns 302 (Found)<br/> redirecting to the resource.
   client->>resource URL:GET
   resource URL-->>client:HTTP 200
   Note over client,resource URL:The client fetches the resource at the specified URL.
```




