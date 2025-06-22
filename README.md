# The Only Kubernetes & Docker Commands You Need When Everything’s on Fire

This document provides a quick reference guide to essential Docker and Kubernetes commands, categorized for various troubleshooting and management scenarios.

---

## 👉 Container Crisis Mode

Commands to quickly identify and understand issues with containers and pods that are not running as expected.

* **`docker ps -a | grep Exited`**
    * **Explanation:** Lists all Docker containers (even stopped ones) and then filters the output to show only those with an "Exited" status. This helps identify containers that have stopped unexpectedly.
* **`kubectl get pods –field-selector=status.phase=Failed`**
    * **Explanation:** Retrieves a list of Kubernetes pods and filters them to show only those where the `status.phase` is "Failed." This is crucial for pinpointing pods that have encountered unrecoverable errors.
* **`docker logs -f –tail 100 {container}`**
    * **Explanation:** Displays the last 100 lines of logs from a specified Docker container and then continues to follow (stream) new log entries in real-time. Replace `{container}` with the actual container name or ID.
* **`kubectl describe pod {name}`**
    * **Explanation:** Provides detailed information about a specific Kubernetes pod, including its current state, events, resource limits, and more. Replace `{name}` with the pod's name. The events section is particularly useful for understanding why a pod is failing.
* **`docker system prune -a`**
    * **Explanation:** Removes all stopped containers, all unused networks, all dangling images, and optionally, all build cache. The `-a` flag means "all" and includes all unused images. This is useful for freeing up disk space during a crisis.

---

## 👉 Debug Warriors

Commands for gaining access to containers/pods and gathering more in-depth debugging information.

* **`kubectl exec -it {pod} – /bin/bash`**
    * **Explanation:** Allows you to execute a command inside a running container within a Kubernetes pod. `-it` provides an interactive TTY, making it feel like you've shelled into the pod. `/bin/bash` is the command to run the bash shell. Replace `{pod}` with the pod's name.
* **`docker exec -it {container} sh`**
    * **Explanation:** Similar to `kubectl exec`, this command allows you to execute a command inside a running Docker container. `sh` is often used as a lightweight shell if `bash` isn't available. Replace `{container}` with the container name or ID.
* **`kubectl port-forward {pod} 8080:80`**
    * **Explanation:** Forwards a port from a Kubernetes pod to your local machine. In this example, traffic to local port `8080` will be forwarded to port `80` on the specified pod. Replace `{pod}` with the pod's name.
* **`docker inspect {container} | grep -i ip`**
    * **Explanation:** Displays detailed low-level information about a Docker container (including its configuration, state, and network settings) and then filters the output to show lines containing "IP" (case-insensitive). Useful for finding the container's IP address.
* **`kubectl logs {pod} -c {container} –previous`**
    * **Explanation:** Retrieves logs from a specific container within a Kubernetes pod. The `--previous` flag is vital as it shows the logs from the previous instantiation of the container, which is extremely helpful if a container has crashed and restarted. Replace `{pod}` and `{container}` with their respective names.

---

## 👉 Resource Rangers

Commands to monitor and inspect resource usage across your Kubernetes cluster and Docker environment.

* **`kubectl top nodes`**
    * **Explanation:** Shows CPU and memory usage for all nodes in your Kubernetes cluster. Requires the Metrics Server to be installed in your cluster.
* **`kubectl top pods`**
    * **Explanation:** Shows CPU and memory usage for all pods in your Kubernetes cluster. Also requires the Metrics Server.
* **`docker stats –no-stream`**
    * **Explanation:** Displays a live stream of resource usage statistics (CPU, memory, network I/O, disk I/O) for all running Docker containers. The `--no-stream` flag shows a snapshot and exits.
* **`kubectl get pods -o wide`**
    * **Explanation:** Lists Kubernetes pods and provides additional details in a wide format, including the node they are running on and their internal IP addresses.
* **`docker images –format “table {{.Repository}}\t{{.Tag}}\t{{.Size}}”`**
    * **Explanation:** Lists all Docker images and formats the output as a table, showing the repository name, tag, and size of each image. This is useful for auditing image sizes and identifying large images that might consume excessive disk space.

---

## 👉 Network Ninjas

Commands to inspect and troubleshoot networking configurations in Kubernetes and Docker.

* **`kubectl get svc`**
    * **Explanation:** Lists all Kubernetes Services, which define how to access applications running on pods. This shows their types (ClusterIP, NodePort, LoadBalancer), cluster IPs, external IPs, and ports.
* **`docker network ls`**
    * **Explanation:** Lists all Docker networks, showing their names, IDs, and drivers. Useful for understanding how your containers are connected.
* **`kubectl get ingress`**
    * **Explanation:** Lists all Kubernetes Ingress resources, which manage external access to services within the cluster, typically HTTP/S.
* **`docker port {container}`**
    * **Explanation:** Displays the port mappings for a specified Docker container, showing which container ports are mapped to which host ports. Replace `{container}` with the container name or ID.
* **`kubectl get endpoints`**
    * **Explanation:** Lists all Kubernetes Endpoints. Endpoints are objects that contain a list of network addresses (IP addresses and ports) of pods that are backing a Kubernetes Service.

---

## 👉 Quick Fixes

Commands for rapidly resolving common issues by restarting or removing components.

* **`kubectl delete pod {name} –force –grace-period=0`**
    * **Explanation:** Forcefully deletes a Kubernetes pod immediately. `--force --grace-period=0` bypasses the graceful shutdown period, which can be useful when a pod is stuck in a terminating state. Use with caution. Replace `{name}` with the pod's name.
* **`docker restart {container}`**
    * **Explanation:** Restarts a running Docker container. This is often the first step in troubleshooting a misbehaving container. Replace `{container}` with the container name or ID.
* **`kubectl rollout restart deployment/{name}`**
    * **Explanation:** Triggers a restart of all pods managed by a Kubernetes Deployment. This is a controlled way to refresh an application, often used after updating a ConfigMap or Secret that the application uses. Replace `{name}` with the deployment's name.
* **`docker rm $(docker ps -aq)`**
    * **Explanation:** Removes all Docker containers. `docker ps -aq` lists all container IDs (including stopped ones). This is a powerful command, use with extreme care as it will delete all your containers.
* **`kubectl scale deployment {name} –replicas=0`**
    * **Explanation:** Scales a Kubernetes Deployment to zero replicas, effectively stopping all pods managed by that deployment. Useful for temporarily shutting down an application without deleting the deployment definition. Replace `{name}` with the deployment's name.

---

## 👉 YAML Wranglers

Commands for working with Kubernetes YAML configurations and creating temporary containers.

* **`kubectl apply -f - | kubectl delete -f -`**
    * **Explanation:** This is a powerful one-liner for "re-applying" (or effectively restarting) a resource defined in a YAML file that's piped to standard input. It first applies the configuration and then immediately deletes it. This is useful for quick testing or resetting a resource.
* **`kubectl get pod {name} -o yaml > debug.yaml`**
    * **Explanation:** Retrieves the full YAML definition of a specified Kubernetes pod and saves it to a file named `debug.yaml`. This is invaluable for inspecting the live configuration of a pod, including its environment variables, volumes, and more. Replace `{name}` with the pod's name.
* **`docker run –rm -it {image} sh`**
    * **Explanation:** Runs a temporary Docker container from a specified image. The `--rm` flag automatically removes the container when it exits. `-it` provides an interactive TTY. `sh` is the command to run inside the container. Useful for quick tests or debugging without leaving behind lingering containers. Replace `{image}` with the image name.
* **`kubectl create secret generic –dry-run=client -o yaml`**
    * **Explanation:** Generates a YAML manifest for a Kubernetes generic secret without actually creating it in the cluster. `--dry-run=client` ensures it only performs a client-side dry run, and `-o yaml` outputs the result in YAML format. This is excellent for templating secrets before applying them.
* **`kubectl explain {resource}`**
    * **Explanation:** Provides documentation for a specified Kubernetes resource type. For example, `kubectl explain pod` will show you all the fields and their descriptions for a Pod resource. This is an indispensable command for understanding Kubernetes YAML structure.

---

## 👉 Cluster Intelligence

Commands for gathering high-level information about your Kubernetes cluster and Docker environment.

* **`kubectl get all -A`**
    * **Explanation:** Retrieves all types of resources (pods, services, deployments, etc.) across all namespaces (`-A` or `--all-namespaces`) in your Kubernetes cluster. A comprehensive overview.
* **`kubectl cluster-info`**
    * **Explanation:** Displays information about the Kubernetes cluster, including the addresses of the control plane and CoreDNS services.
* **`docker version`**
    * **Explanation:** Shows the version information for your Docker client and Docker daemon. Useful for checking compatibility and identifying potential issues related to software versions.
* **`kubectl config current-context`**
    * **Explanation:** Displays the name of the currently active Kubernetes context. A context defines the cluster, user, and namespace that `kubectl` commands will interact with.
* **`kubectl get events –sort-by=’.lastTimestamp’`**
    * **Explanation:** Lists recent events that have occurred in the Kubernetes cluster. Events provide insights into what actions have been taken (e.g., pod scheduled, container started, image pulled) and any errors that have occurred. `--sort-by='.lastTimestamp'` orders them by the most recent first.

---

## 👉 Pro Tips

Handy shortcuts and commands for improving your daily Kubernetes and Docker workflow.

* **`alias k=kubectl`**
    * **Explanation:** Creates a shell alias, allowing you to use `k` instead of typing `kubectl` for all your Kubernetes commands. Save time and typing!
* **`kubectl config set-context –current –namespace={ns}`**
    * **Explanation:** Changes the default namespace for your current Kubernetes context. This means subsequent `kubectl` commands will operate within the specified namespace without needing the `-n` flag. Replace `{ns}` with the desired namespace name.
* **`docker system df`**
    * **Explanation:** Reports Docker disk usage, showing how much space is consumed by images, containers, local volumes, and the build cache. Similar to the `df` command for file systems.
* **`kubectl api-resources`**
    * **Explanation:** Lists all the API resources available in your Kubernetes cluster, along with their short names, API groups, and whether they are namespaced. This is useful for discovering what types of objects you can create or interact with.
* **`watch kubectl get pods`**
    * **Explanation:** Continuously executes the `kubectl get pods` command every 2 seconds (by default) and displays the output, allowing you to monitor the state of your pods in real-time. Press `Ctrl+C` to exit.

---
